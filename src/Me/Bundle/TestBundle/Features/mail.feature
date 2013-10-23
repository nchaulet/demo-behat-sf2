Feature: Registering to newsletter

    Scenario: Registering to a newsletter with a valid mail
        Given I am on "/demo-2"
        When I fill in "email" with "test@test.fr"
        And I press "Je m'inscris"
        Then I should see "message envoyé"
        And I should get an email on "test@test.fr"

    Scenario: Registering to a newsletter with a unvalid mail (yopmail)
        Given I am on "/demo-2"
        When I fill in "email" with "test@yopmail.fr"
        And I press "Je m'inscris"
        Then I should see "Mail invalide"

    Scenario: Registering to a newsletter with a unvalid mail (yopmail)
        Given I am on "/demo-2"
        When I press "Je m'inscris"
        Then I should see "Mail invalide"



