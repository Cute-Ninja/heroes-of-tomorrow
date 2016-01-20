Feature: Display the details of a User

  Scenario Outline: An Anonymous User want to edit an User
    Given I am an Anonymous User
    When I want to edit the User named "<username>"
    Then the response status code should be 401
    Examples:
      | username    |
      | nonexistent |
      | Ghriim      |


  @regenerateDB
  Scenario Outline: A logged in User want to edit an User
    Given I am the Player named "Ghriim"
    When I want to edit the User named "<username>" with the following values
      | email    | testuser@fakemail.com |
      | password | azerty                |
    Then the response status code should be <responseCode>
    Examples:
      | username    | responseCode |
      | nonexistent | 404          |
      | Ghriim      | 204          |
      | anotherUser | 403          |
