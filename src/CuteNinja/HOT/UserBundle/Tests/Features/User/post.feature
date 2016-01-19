Feature: Display the details of a User

  Scenario: An Anonymous User want to add a User
    Given I am an Anonymous User
    When I want to add a new User
    Then the response should be JSON
    And the response status code should be 401


  Scenario: A logged in User want to add a User
    Given I am the Player named "Ghriim"
    When I want to add a new User
    Then the response should be JSON
    And the response status code should be 501