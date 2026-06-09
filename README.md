# TD Virtualisation & Cybersécurité — Environnement de départ - PN 06/2026

**État volontairement NON sécurisé.** Cette pile sert de point de départ au TD de
sécurisation : à vous de corriger les problèmes signalés par `(!)` dans les fichiers
de configuration. Usage **strictement local et pédagogique**.

## Démarrer

```bash
cd td-securisation
docker compose up -d --build
docker compose ps
```

- Application via le reverse proxy : http://localhost:8080
- Accès direct au backend (à supprimer en Faille 2) : http://localhost:8081
- Base MySQL exposée (à supprimer en Faille 1) : port 3306

> Au premier lancement, MySQL peut prendre quelques secondes à s'initialiser. Si une page
> affiche « Base de données indisponible », rechargez après 10–15 s.

## Arborescence

```
td-securisation/
├── docker-compose.yml      # orchestration et réseaux (à durcir)
├── Dockerfile              # image du service web (à durcir : non-root)
├── nginx/
│   ├── default.conf         # reverse proxy (TLS, en-têtes, rate-limiting à ajouter)
│   └── certs/               # vide : y générer le certificat (Faille 2)
├── secrets/                # vide : y placer db_password.txt (Faille 4)
└── xvwa/                   # application vulnérable (à analyser, pas à recoder)
    ├── index.php
    ├── login.php            # page de test du rate-limiting
    ├── db.php               # connexion + jeu de données de démonstration
    └── vulnerabilities/
        ├── sqli/            # injection SQL
        ├── reflected_xss/   # XSS réfléchie
        ├── stored_xss/      # XSS stockée
        └── file_upload/     # upload non sécurisé
```

## Remettre à zéro

```bash
docker compose down -v
```
