Feature: Add a new a Character

  Scenario: An Anonymous Character want to add a Character
    Given I am an Anonymous User
    When I want to add a new Character
    Then the response should be JSON
    And the response status code should be 401

  @regenerateDB
  Scenario Outline: A logged in Character want to add a Character
    Given I am the Player named "<username>"
    When I want to add a new Character with the following values
      | name | <characterName> |
    Then the response should be JSON
    And the response status code should be <responseCode>
    Examples:
      | username             | characterName   | responseCode |
      | Ghriim               | oGN - Cernunnos | 422          |
      | userWithoutCharacter | oGN - Cernunnos | 422          |
      | userWithoutCharacter | awesomeName     | 201          |