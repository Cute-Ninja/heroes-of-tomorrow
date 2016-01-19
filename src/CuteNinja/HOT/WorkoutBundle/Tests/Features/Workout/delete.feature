Feature: Display the details of a Workout

  Scenario Outline: An Anonymous Workout want to delete a non existing Workout
    Given I am an Anonymous User
    When I want to delete the Workout named "<name>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | name        |
      | nonexistent |
      | Sleipnir    |


  Scenario Outline: A logged in Workout want to delete an existing Workout
    Given I am the Player named "Ghriim"
    When I want to delete the Workout named "<name>"
    Then the response should be JSON
    And the response status code should be <responseCode>
    Examples:
      | name        | responseCode |
      | nonexistent | 501          |
      | Sleipnir    | 501          |