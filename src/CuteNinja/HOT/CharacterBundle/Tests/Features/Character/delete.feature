Feature: Display the details of a Character

  Scenario Outline: An Anonymous Character want to delete a non existing Character
    Given I am an Anonymous User
    When I want to delete the Character named "<name>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | name        |
      | nonexistent |
      | Sleipnir    |


  Scenario Outline: A logged in Character want to delete an existing Character
    Given I am the Player named "Ghriim"
    When I want to delete the Character named "<name>"
    Then the response should be JSON
    And the response status code should be <responseCode>
    Examples:
      | name        | responseCode |
      | nonexistent | 501          |
      | Sleipnir    | 501          |