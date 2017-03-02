Feature: Users and groups permissions tests

  @api
  Scenario Outline: As a <role>, I should be able to create new users

    Given I am logged in as a user with the "<role>" role
    And I am on "admin/people/create"
    Then I <visibility> see the button "Create new account"

    Examples:
      | role               | visibility |
      | Authenticated User | should not |
      | Administrator      | should     |
