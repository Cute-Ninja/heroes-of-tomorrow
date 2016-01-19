Feature: Display the details of a Equipment

  Scenario: An Anonymous Equipment want to add a Equipment
    Given I am an Anonymous User
    When I want to add a new Equipment
    Then the response should be JSON
    And the response status code should be 401


  Scenario: A logged in Equipment want to add a Equipment
    Given I am the Player named "Ghriim"
    When I want to add a new Equipment
    Then the response should be JSON
    And the response status code should be 501