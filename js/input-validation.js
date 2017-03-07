 jQuery( document ).ready(function( $ ) {

            // Begin als de cursor een tekstveld verlaat
            $('form input').keyup(function () {

                // Waarde in het teksteveld
                var val = $(this).val();

                // Verwijder spatie aan begin en eind
                var trim = val.trim();

                // Lengte van de waarde
                var chars = trim.length;

                // Doe iets als een invulveld leeg is of het e-mailadres heeft een ongeldige notatie
				if (chars == 0 || ($(this).attr('name') == 'data[register][email]' && !validateEmail(val))) {

                    // Verwijder class
                    $(this).removeClass('goed');
					
					// Voeg class toe
					$(this).addClass('fout');
					
					// Schakel verzendknop uit als er een fout is
					//$('form input[type="submit"]').attr('disabled', 'disabled').removeClass('verstuur');

                    return false;
                }

                if (chars > 0) {
				
					// Stel teller in
                    var fouten = 0;

                    // Verwijder class
                    $(this).removeClass('fout');
					
					// Voeg class toe
                    $(this).addClass('goed');
					
                    // Doorloop elk tekstveld van het formulier
                    $('form input').each(function () {
					
						var inputValue = $(this).val();

                        // Optellen als veld een class 'fout' heeft of niet is ingevuld
                        if ($(this).hasClass('fout') || inputValue.length == 0) {
							fouten++;
                        }
                    });

                    if (fouten == 0) {
                        // Maak verzendknop klikbaar als er geen fouten zijn
                        $('form input[type="submit"]').removeAttr('disabled').addClass('verstuur');
                    }
                }
            });
			
			function validateEmail(email) {
				
				// Valideer e-mailadres
				
				var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				
				if (regex.test(email)) {
					return true;
				}
				
				return false;
			}

        });