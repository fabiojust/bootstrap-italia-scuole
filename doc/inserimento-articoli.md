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
