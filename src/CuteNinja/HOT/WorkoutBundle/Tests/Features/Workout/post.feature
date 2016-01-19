Feature: Display the details of a Workout

  Scenario: An Anonymous Workout want to add a Workout
    Given I am an Anonymous User
    When I want to add a new Workout
    Then the response should be JSON
    And the response status code should be 401


  Scenario: A logged in Workout want to add a Workout
    Given I am the Player named "Ghriim"
    When I want to add a new Workout
    Then the response should be JSON
    And the response status code should be 501