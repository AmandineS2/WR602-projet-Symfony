describe('Formulaire de Connexion', () => {
    it('test 1 - connexion OK', () => {
      cy.visit('http://127.0.0.1:8000/register');
  
      // Entrer le nom d'utilisateur et le mot de passe
      cy.get('#registration_form_email').type('test2@test.com');
      cy.get('#registration_form_plainPassword').type('12345678910');
  
      // Soumettre le formulaire
      cy.get('button[type="submit"]').click();
  
      // Vérifier que l'utilisateur est connecté
      cy.contains('Se connecter').should('exist');
    });
  
    it('test 2 - connexion KO', () => {
        cy.visit('http://127.0.0.1:8000/login');
    
        // Entrer un nom d'utilisateur et un mot de passe incorrects
        cy.get('#username').type('test2@test.com');
        cy.get('#password').type('12345678910');
    
        // Soumettre le formulaire
        cy.get('button[type="submit"]').click();
    
        // Vérifier que le message d'erreur est affiché
        cy.contains('Se connecter').should('exist');
      });
  });