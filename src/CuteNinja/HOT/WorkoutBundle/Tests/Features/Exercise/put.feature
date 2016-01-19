Feature: Display the details of a Exercise

  Scenario Outline: An Anonymous Exercise want to edit a non existing Exercise
    Given I am an Anonymous User
    When I want to edit the Exercise named "<username>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | username    |
      | nonexistent |
      | Squat       |


  Scenario Outline: A logged in Exercise want to edit an existing Exercise
    Given I am the Player named "Ghriim"
    When I want to edit the Exercise named "<username>"
    Then the response should be JSON
    And the response status code should be <responseCode>
    Examples:
      | username    | responseCode |
      | nonexistent | 501          |
      | Squat       | 501          |