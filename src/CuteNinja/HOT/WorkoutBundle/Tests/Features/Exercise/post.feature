Feature: Display the details of a Exercise

  Scenario: An Anonymous Exercise want to add a Exercise
    Given I am an Anonymous User
    When I want to add a new Exercise
    Then the response should be JSON
    And the response status code should be 401


  Scenario: A logged in Exercise want to add a Exercise
    Given I am the Player named "Ghriim"
    When I want to add a new Exercise
    Then the response should be JSON
    And the response status code should be 501