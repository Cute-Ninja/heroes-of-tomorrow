Feature: Display the list of a Characters

  Scenario: An Anonymous User want to access the list of a Characters
    Given I am an Anonymous User
    When I want to list all Characters
    Then the response should be JSON
    And the response must be optimized
    And the response status code should be 200
    And the list should contains 100 items