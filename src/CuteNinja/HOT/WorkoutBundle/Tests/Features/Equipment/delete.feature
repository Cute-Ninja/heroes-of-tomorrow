Feature: Display the details of a Equipment

  Scenario Outline: An Anonymous Equipment want to delete a non existing Equipment
    Given I am an Anonymous User
    When I want to delete the Equipment named "<name>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | name        |
      | nonexistent |
      | Jump Rope   |


  Scenario Outline: A logged in Equipment want to delete an existing Equipment
    Given I am the Player named "Ghriim"
    When I want to delete the Equipment named "<name>"
    Then the response should be JSON
    And the response status code should be <responseCode>
    Examples:
      | name        | responseCode |
      | nonexistent | 501          |
      | Jump Rope   | 501          |