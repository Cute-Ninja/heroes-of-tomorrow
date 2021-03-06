Feature: Display the details of a User

  Scenario Outline: An Anonymous User want to delete an User
    Given I am an Anonymous User
    When I want to delete the User named "<username>"
    Then the response status code should be 401
    Examples:
      | username    |
      | nonexistent |
      | Ghriim      |


  Scenario Outline: A logged in User want to delete an User
    Given I am the Player named "Ghriim"
    When I want to delete the User named "<username>"
    Then the response status code should be <responseCode>
    Examples:
      | username    | responseCode |
      | nonexistent | 501          |
      | Ghriim      | 501          |