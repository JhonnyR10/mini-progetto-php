# Mini Progetto PHP

## Descrizione

Questo progetto è un'applicazione PHP semplice che consente di gestire una lista di post. Gli utenti possono visualizzare tutti i post, creare nuovi post e visualizzare i dettagli di un singolo post.

## Struttura del Progetto

```
mini-progetto-php
├── src
│   ├── index.php          # Punto di ingresso principale dell'applicazione
│   ├── crea_post.php      # Form per creare un nuovo post
│   ├── dettagli_post.php   # Visualizzazione dei dettagli di un singolo post
│   └── includes
│       └── api.php        # Funzioni per interagire con l'API esterna
├── README.md              # Documentazione del progetto
```

## Requisiti

- PHP 7.0 o superiore
- Estensione cURL abilitata

## Installazione

1. Clona il repository o scarica il progetto.
2. Assicurati di avere un server web con PHP installato (ad esempio, XAMPP, MAMP, o un server Linux con Apache).
3. Posiziona la cartella `mini-progetto-php` nella directory del tuo server web.
4. Accedi al progetto tramite il browser all'indirizzo `http://localhost/mini-progetto-php/src/index.php`.
5. In alternativa all'interno di `mini-progetto-php/src`aprire un terminale e avviare `php -S localhost:8000` e poi dal browser aprire `http://localhost:8000/index.php`

## Utilizzo

- **Visualizza Post**: Accedi a `index.php` per visualizzare la lista dei post.
- **Crea Post**: Vai a `crea_post.php` per creare un nuovo post. Compila il modulo e invialo.
- **Dettagli Post**: Per visualizzare i dettagli di un post specifico, accedi a `dettagli_post.php?id=ID_DEL_POST`, sostituendo `ID_DEL_POST` con l'ID del post desiderato.

## Note

- Assicurati che l'API esterna sia accessibile e funzionante per il corretto funzionamento dell'applicazione.
- In caso di problemi, controlla i log del server per eventuali errori.
