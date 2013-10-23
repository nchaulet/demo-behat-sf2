Feature: Testing Counter

    @javascript
    Scenario: click on counter then reset it
        Given I am on "/demo-1"
        Then I should see "0 click(s)"
        When I press "Click me !"
        Then I should see "1 click(s)"
        When I press "Click me !"
        Then I should see "2 click(s)"
        When I press "Click me !"
        Then I should see "3 click(s)"
        When I press "Reset"
        Then I should see "0 click(s)"


