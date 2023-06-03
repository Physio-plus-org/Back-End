# R1: Δημιουργία Φυσιοθεραπευτηρίου (Όνομα, Διεύθυνση, ΑΦΜ)

Αρχείο database.php δημιουργεί μια βάση δεδομένων με όνομα **physio** και έναν πίνακα **physio_centers**. Στον πίνακα αυτόν δημιουργεί ένα πεδίο id (κλειδί), ένα πεδίο όνομα (**name**), ένα πεδίο Διεύθυνση (**address**) και ένα πεδίο ΑΦΜ (**tax_id_number**). Δημιουργεί και έναν ακόμα πίνακα για τους χρήστες (Φυσιοθεραπευτές) αλλά ίσως να το κάνουμε drop.   

Το αρχείο r1.php είναι σούπερ απλό που γράφει δεδομένα στην βάση τα name, address και tax_id_number.

Η βάση δημηουργήθηκε σύμφωνα με το αρχείο που έστειλε ο Κώστας.

Αλλαγές 15/5/2023

Άλλαξα τον κώδικα να επιστρέφει μήνυμα εάν υπάρχει ήδη το ΑΦΜ. Λογικά να πηγαίνει στο Fronend το μήνυμα αυτό και να ενημερώνει τον χρήστη.