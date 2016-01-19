Feature: Display the details of a User

  Scenario Outline: An Anonymous User want to access the details of a non existing User
    Given I am an Anonymous User
    When I want to see the details of the User named "<username>"
    Then the response should be JSON
    And the response status code should be 401
    Examples:
      | username    |
      | nonexistent |
      | Ghriim      |


  Scenario Outline: A logged in User want to access the details of an existing User
    Given I am the Player named "Ghriim"
    When I want to see the details of the User named "<username>"
    Then the response should be JSON
    And the response must be optimized
    And the response status code should be <responseCode>
    Examples:
      | username    | responseCode |
      | nonexistent | 404          |
      | Ghriim      | 200          |