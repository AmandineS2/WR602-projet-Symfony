describe('Formulaire de Connexion', () => {

  
    it('test 4 - pdf generate', () => {
        cy.visit('http://127.0.0.1:8000/login');
  
        // Entrer le nom d'utilisateur et le mot de passe
        cy.get('#username').type('test@test.com');
        cy.get('#password').type('123456789');
    
        // Soumettre le formulaire
        cy.get('button[type="submit"]').click();
        cy.visit('http://127.0.0.1:8000/pdf');
  
        // Entrer un nom d'utilisateur et un mot de passe incorrects
        cy.get('#form_htmlContent').type('https://wattpad.com');
  
        // Soumettre le formulaire
        cy.get('button[type="submit"]').click();
  
        // Vérifier que le message d'erreur est affiché
        cy.contains('Tous les outils').should('exist');
    });
  });