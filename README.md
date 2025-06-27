# Hacker Sim

**Hacker Sim** è un browser game testuale in stile "punta-e-clicca", ambientato in un mondo digitale post-apocalittico controllato da una IA totalitaria. I giocatori agiscono come menti digitali, partecipando ad attività white/black hat, PvP, missioni, politica e strategia economica.  
Interamente server-side, la UI richiama un terminale testuale, e il gameplay si sviluppa in 5 fasi progressive con un sistema economico, PvP e politico profondo.

---

## 🚀 Stack Tecnico

| Componente | Dettaglio                            |
|------------|--------------------------------------|
| PHP        | 8.4                                  |
| Framework  | Laravel 11.x                         |
| Database   | MySQL (phpMyAdmin per gestione)      |
| UI         | Blade (Laravel) - stile testuale     |
| Routing    | Laravel web routes + API routes      |
| Sicurezza  | Logica solo lato server, dati cifrati|

---

## 📌 Caratteristiche principali

- Autenticazione e gestione sessioni IP
- Middleware avanzati per fasi, spoofing, limiti attacchi
- Console Commands per bot (artisan hacker:bot)
- Job scheduler per eventi (spam, adware, income)
- Seeder per generare bot, società, taglie
- Policy/Gate per protezione azioni
- UI Blade minimale stile terminale (console, menu, logica centrale)
- Nessuna logica visibile lato client, API interne protette/IP autorizzati

---

## 🗃️ Database – Struttura di Base

| Tabella          | Scopo                                  |
|------------------|----------------------------------------|
| users            | Utenti giocatori                       |
| software         | Upgrade software utente                |
| attacks          | Log attacchi PvP                       |
| missions         | Missioni white/black hat               |
| clans            | Clan e governance                      |
| companies        | Società possedute                      |
| shares           | Quote aziendali                        |
| conglomerates    | (da Fase 4)                            |
| adware_links     | Adware attivi/infetti                  |
| bounties         | Sistema taglie                         |
| logs             | Log visualizzazioni/scansioni          |
| bots             | Simulazioni automatiche                |

---

## 💻 Software del Giocatore

- **SDK:** attacchi trojan (supera antivirus)
- **Spam:** income passivo
- **AdWare:** infetta target, guadagno su spam
- **Firewall:** difesa, nasconde IP
- **Antivirus:** blocca SDK/AdWare
- **IP Spoofer:** nasconde IP (se > firewall target)
- **Scanner:** vede stats target avanzati

---

## 🧠 Fasi di Gioco

1. **Tutorial** – hardware, missioni base (unlock Fase 2)
2. **PvP** – spoof, firewall, spyware
3. **Economia** – società, mercato, taglie
4. **Politica** – clan, referendum, conglomerati
5. **Ruoli Globali** – top player amministratori settore

---

## 📈 Economie e Valute

- **Denaro Pulito:** legale, per upgrade/trading
- **Denaro Sporco:** da missioni black hat, riciclabile
- **Crypto Legali:** stabili, regolate
- **Crypto Illegali:** instabili, mercato nero

---

## 🤖 Bot di Test

- 20 bot: 10 white hat, 10 black hat, AI-driven
- Farming missioni, attacchi, upgrade, clan, quote, simulazione taglie

---

## 🗺️ Roadmap (Macro-Funzionalità)

1. [ ] Autenticazione e sessione IP
2. [ ] Middleware fasi, spoofing, limiti
3. [ ] Migrations principali (users, software, etc.)
4. [ ] Seeder (bot, società, taglie)
5. [ ] Console Blade UI testuale
6. [ ] Sistema missioni e PvP
7. [ ] Clan, società, conglomerati
8. [ ] Economia e valute
9. [ ] Ruoli globali (Fase 5)
10. [ ] Sicurezza API/IP, Policy/Gate

---

## 📝 Come contribuire

1. Fork & clone
2. Installa dipendenze (`composer install`, `npm install`)
3. Crea file `.env` e configura DB
4. Esegui `php artisan migrate --seed`
5. Avvia server: `php artisan serve`
6. Collabora tramite Pull Request!

---

## 📄 Licenza

MIT (vedi LICENSE)

---

## 📚 Documentazione

Vedi cartella `/docs` per approfondimenti tecnici, design e regole gameplay.
