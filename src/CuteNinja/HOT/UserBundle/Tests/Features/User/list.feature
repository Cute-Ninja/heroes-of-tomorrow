Feature: Display the list of a Users

  Scenario: An Anonymous User want to access the list of a Users
    Given I am an Anonymous User
    When I want to list all Users
    Then the response should be JSON
    And the response status code should be 401

  Scenario: A logged in User want to access the list of a Users
    Given I am the Player named "Ghriim"
    When I want to list all Users
    Then the response should be JSON
    And the response must be optimized
    And the response status code should be 200
    And the list should contains 102 items