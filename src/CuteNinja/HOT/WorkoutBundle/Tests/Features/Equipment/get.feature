Feature: Display the details of a Equipment

  Scenario Outline: An Anonymous User want to access the details of a non existing Equipment
    Given I am an Anonymous User
    When I want to see the details of the Equipment named "<name>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | name        |
      | nonexistent |
      | Jump Rope    |


  Scenario Outline: A logged in User want to access the details of an existing Equipment
    Given I am the Player named "Ghriim"
    When I want to see the details of the Equipment named "<name>"
    Then the response should be JSON
    And the response must be optimized
    And the response status code should be <responseCode>
    Examples:
      | name        | responseCode |
      | nonexistent | 404          |
      | Jump Rope    | 200          |