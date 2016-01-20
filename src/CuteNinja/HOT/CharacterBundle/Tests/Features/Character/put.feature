Feature: Display the details of a Character

  Scenario Outline: An Anonymous Character want to edit a non existing Character
    Given I am an Anonymous User
    When I want to edit the Character named "<username>"
    Then the response status code should be 401
    Examples:
      | username        |
      | nonexistent     |
      | oGN - Cernunnos |


  Scenario Outline: A logged in Character want to edit an existing Character
    Given I am the Player named "Ghriim"
    When I want to edit the Character named "<username>"
    Then the response status code should be <responseCode>
    Examples:
      | username        | responseCode |
      | nonexistent     | 501          |
      | oGN - Cernunnos | 501          |