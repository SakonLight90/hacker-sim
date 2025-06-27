# Hacker Sim – Overview Tecnica

## Stack

- PHP 8.4
- Laravel 11.x
- MySQL
- Blade (UI testuale)
- phpMyAdmin (dev only)

## Sicurezza

- Tutta la logica lato server
- Niente dati/endpoint esposti nel frontend
- API protette e accessibili solo da IP autorizzati

## Database (Eloquent ORM)

**Tabelle principali:**
- users
- software
- attacks
- missions
- clans
- companies
- shares
- conglomerates
- adware_links
- bounties
- logs
- bots

**Vedi migrations per dettagli colonne.**

## Macro-fasi Gioco

1. **Tutorial**: onboarding, hardware, missioni base
2. **PvP**: spoof, firewall, spyware
3. **Economia**: società, mercato, taglie
4. **Politica**: clan, referendum, conglomerati
5. **Ruoli globali**: top player amministratori settore

## Middleware personalizzati

- Fase di gioco
- IP/sessione
- Limite attacchi
- Spoofing

## Console Commands

- artisan hacker:bot (avvia ciclo bot automatico)
- artisan hacker:seed (popola bot, società, taglie, ecc.)

## Blade UI

- Layout terminale (resources/views/layouts/terminal.blade.php)
- Console principale, menu testuale, status dinamici

## Bot

- 20 bot (10 white hat, 10 black hat)
- Farming, attacchi, upgrade, clan, quote, taglie

## Stato attuale

Vedi README.md per roadmap e stato sviluppo macro-funzionalità.
