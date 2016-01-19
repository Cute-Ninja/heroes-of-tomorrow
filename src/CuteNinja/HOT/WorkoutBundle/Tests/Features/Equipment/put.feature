Feature: Display the details of a Equipment

  Scenario Outline: An Anonymous Equipment want to edit a non existing Equipment
    Given I am an Anonymous User
    When I want to edit the Equipment named "<username>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | username    |
      | nonexistent |
      | Jump Rope   |


  Scenario Outline: A logged in Equipment want to edit an existing Equipment
    Given I am the Player named "Ghriim"
    When I want to edit the Equipment named "<username>"
    Then the response should be JSON
    And the response status code should be <responseCode>
    Examples:
      | username    | responseCode |
      | nonexistent | 501          |
      | Jump Rope   | 501          |