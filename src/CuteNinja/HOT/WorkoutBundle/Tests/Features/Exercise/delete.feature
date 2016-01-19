Feature: Display the details of a Exercise

  Scenario Outline: An Anonymous Exercise want to delete a non existing Exercise
    Given I am an Anonymous User
    When I want to delete the Exercise named "<name>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | name        |
      | nonexistent |
      | Squat       |


  Scenario Outline: A logged in Exercise want to delete an existing Exercise
    Given I am the Player named "Ghriim"
    When I want to delete the Exercise named "<name>"
    Then the response should be JSON
    And the response status code should be <responseCode>
    Examples:
      | name        | responseCode |
      | nonexistent | 501          |
      | Squat       | 501          |