Feature: Display the details of a Character

  Scenario: An Anonymous Character want to add a Character
    Given I am an Anonymous User
    When I want to add a new Character
    Then  the response status code should be 401


  Scenario: A logged in Character want to add a Character
    Given I am the Player named "Ghriim"
    When I want to add a new Character
    Then the response status code should be 501