# Inserimento articoli

Per inserire gli articoli occorre andare in contenuto -> articoli -> nuovo.

Prendiamo in esempio questo articolo.

![articolo-esempio](https://jit.protocollicreativi.it/templates/joomla-italia-theme/doc/img/articolo-esempio.png)

Per ogni articolo:

- Inserire titolo
- Testo articolo: riga di testo in anteprima
- Categoria
- Tag
- Immagini nella tab Immagini e link
- Nella tab “Servizi” inserire il testo nei custom field

# Nota
Per l'articolo Licenza dei contenuti è necessario cliccare sulla Tab "Opzioni" e su layout selezionare "note-legali". 

# Offerta Formativa (Indirizzi di studio e Potenziamenti)

La sezione **Offerta Formativa** utilizza un layout a card (`it-card`) speciale. La pagina principale raggruppa automaticamente gli articoli in base alla categoria di appartenenza (es. *Indirizzi di studio* e *Potenziamenti*).

Per configurare la vista correttamente nel menu:
- Voce di menu: Tipo **Categoria Blog** -> Categoria: *Offerta Formativa*
- Scheda **Opzioni** -> **Layout alternativo**: seleziona `offertaformativa`

### Come configurare gli articoli
A seconda della categoria, la card può mostrare un'**Icona** oppure un'**Immagine**.

#### 1. Indirizzi di studio (Modalità Icona)
*La categoria non deve avere nessuna immagine impostata.*
Nella scheda **Immagini e link** dell'articolo:
- **Immagine intro**: Inserisci il nome dell'icona (es. `bi-laptop`, `bi-palette`, `it-code`, `it-presentation`). Verrà mostrata in automatico l'icona vettoriale (Bootstrap Icons o Bootstrap Italia).
- **Didascalia immagine intro**: Permette di definire il colore del bordo superiore, dell'icona e del bottone. Inserisci il nome del colore Bootstrap (es. `success`, `warning`, `primary`, `danger`, `info`).
  - *Opzionale: puoi inserire anche qui il nome dell'icona seguito dal colore separato da pipe `|` (es. `bi-laptop|success`).*

#### 2. Potenziamenti (Modalità Immagine)
*La categoria in Joomla (Contenuti -> Categorie -> Potenziamenti) DEVE avere un'immagine impostata nelle sue Opzioni.*
Nella scheda **Immagini e link** dell'articolo:
- **Immagine intro**: Carica normalmente dal Media Manager un'immagine fotografica. Verrà mostrata a larghezza piena in cima alla card.
- **Didascalia immagine intro**: Specifica solo il nome del colore Bootstrap (es. `success`, `warning`, `primary`, `danger`, `info`) per colorare il bordo superiore e il bottone.

# Le Sedi (La Scuola)

La pagina principale "La Scuola" integra automaticamente una sezione **Le nostre sedi** in fondo alla pagina, pescando gli articoli inseriti nella categoria con alias `edifici-scolastici` (oppure `edifici`). 

Per far sì che l'articolo si impagini correttamente come nel layout a card:
- **Titolo dell'articolo**: Inserisci il nome della sede (es. *Sede Centrale*, *Succursale*). Verrà mostrato come etichetta in alto a sinistra sull'immagine.
- **Campo Aggiuntivo "Indirizzo"**: Inserisci l'indirizzo esatto nell'apposito custom field (verrà mostrato come titolo sotto la foto). *(In alternativa, usa la Didascalia Immagine Intro)*.
- **Immagine intro**: Carica la foto dell'edificio nella scheda *Immagini e link*.
- **Testo dell'articolo (Introtext)**: Scrivi la descrizione della sede (es. *Cuore pulsante dell'istituto...*).
- **Bottone Scopri la sede**: Viene generato automaticamente dal sistema e linkerà direttamente alla pagina dell'articolo per leggere maggiori dettagli.
- **Testo Link A (in Immagini e link)**: Scrivi i mezzi di trasporto (es. *Linee 21, 22, 93*). Apparirà l'icona dell'autobus con questo testo.
