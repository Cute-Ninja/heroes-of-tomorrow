Feature: Display the details of a User

  Scenario Outline: An Anonymous User want to add an invalid User
    Given I am an Anonymous User
    When I want to add a new User with the following values
      | email    | <email>    |
      | username | <username> |
      | password | <password> |
    Then the response should be JSON
    And the response status code should be 422
    Examples:
      | email                 | username | password |
      |                       |          |          |
      | testuser@fakemail.com |          |          |
      |                       | testuser |          |
      |                       |          | azerty   |
      | testuser@fakemail.com | testuser |          |
      | testuser@fakemail.com |          | azerty   |
      |                       | testuser | azerty   |

  @regenerateDB
  Scenario: An Anonymous User want to add a valid User
    Given I am an Anonymous User
    When I want to add a new User with the following values
      | email    | testuser@fakemail.com |
      | username | testuser              |
      | password | azerty                |
    Then the response should be JSON
    And the response status code should be 201