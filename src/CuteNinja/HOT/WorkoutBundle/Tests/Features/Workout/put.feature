Feature: Display the details of a Workout

  Scenario Outline: An Anonymous Workout want to edit a non existing Workout
    Given I am an Anonymous User
    When I want to edit the Workout named "<username>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | username    |
      | nonexistent |
      | Sleipnir    |


  Scenario Outline: A logged in Workout want to edit an existing Workout
    Given I am the Player named "Ghriim"
    When I want to edit the Workout named "<username>"
    Then the response should be JSON
    And the response status code should be <responseCode>
    Examples:
      | username    | responseCode |
      | nonexistent | 501          |
      | Sleipnir    | 501          |