Feature: Testing super calculator

    @javascript
    Scenario Outline: Test a + b
        Given I am on "/demo-3"
        When I fill in "numberA" with "<numberA>"
        And I fill in "numberB" with "<numberB>"
        And I press "Go"
        Then I should see "Resultat : <result>"

    Examples:
        |numberA|numberB|result|
        |2      |2      |4     |
        |10     |15     |25    |
        |100    |50     |150   |
        |3      |4      |7     |



