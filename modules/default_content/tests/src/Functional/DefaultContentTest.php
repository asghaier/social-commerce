<?php

namespace Drupal\Tests\default_content\Functional;

use Drupal\simpletest\BrowserTestBase;
use Drupal\simpletest\ContentTypeCreationTrait;
use Drupal\simpletest\NodeCreationTrait;
use Drupal\taxonomy\Entity\Term;

/**
 * Test import of default content.
 *
 * @group default_content
 */
class DefaultContentTest extends BrowserTestBase {

  use ContentTypeCreationTrait;
  use NodeCreationTrait;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('rest', 'taxonomy', 'hal', 'default_content');

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->createContentType(array('type' => 'page'));
    $this->createContentType(array('type' => 'article'));
    // Login as admin.
    $this->account = $this->drupalCreateUser([], 'DefaultContentAdmin', FALSE);
    $this->drupalLogin($this->account);
  }

  /**
   * Test importing default content.
   */
  public function testImport() {
    // Enable the module and import the content.
    \Drupal::service('module_installer')->install(array('default_content_test'), TRUE);
    $this->rebuildContainer();
    $node = $this->getNodeByTitle('Imported node');
    $this->assertEquals($node->body->value, 'Crikey it works!');
    $this->assertEquals($node->getType(), 'page');
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadMultiple();
    $term = reset($terms);
    $this->assertTrue(!empty($term));
    $this->assertEquals($term->name->value, 'A tag');
    $term_id = $node->field_tags->target_id;
    $this->assertTrue(!empty($term_id), 'Term reference populated');
  }

  /**
   * Test stripping entity ids during import.
   */
  public function testImportWithEntityIdConflict() {
    // Create entities with known-conflicting ids.
    $conflict_node = $this->createNode([
      'title' => 'Node with conflicting nid',
      'type' => 'article',
      'nid' => 1,
      'vid' => 1,
    ]);
    $conflict_term = Term::create([
      'name' => 'Tag with conflicting tid',
      'vid' => 'tags',
      'tid' => 1,
    ]);
    $conflict_term->save();

    // Enable the module and import the content.
    \Drupal::service('module_installer')->install(array('default_content_test'), TRUE);
    $this->rebuildContainer();

    // Check conflicting node nid.
    $node = $this->getNodeByTitle('Imported node');
    $this->assertNotEquals($node->id(), $conflict_node->id());
    $this->assertNotEquals($node->getRevisionId(), $conflict_node->getRevisionId());

    // Check conflicting term tid.
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties(['name' => 'A tag']);
    $term = reset($terms);
    $this->assertNotEquals($term->id(), $conflict_term->id());

    // Check conflicting user uid.
    $users = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['name' => 'Administrator']);
    $user = reset($users);
    $this->assertNotEquals($user->id(), $this->account->id());

    // Confirm user with conflicting email was not imported.
    $users = \Drupal::entityTypeManager()->getStorage('user')->loadByProperties(['name' => 'EmailConflict']);
    $this->assertEmpty($users);
  }

}
