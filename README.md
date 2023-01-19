# **Resa - vehicule**

## **Liens Utiles**

- [Trello](https://trello.com/invite/b/HsstgwEn/ATTIbb21c2ff6dfcf0ea11d55001768612266702B637/resa-vehicule) (Suivi du backlog)

- [Document SCRUM](https://docs.google.com/document/d/1jzWGNnzuix2i1c3VxTxgcsdcfnePInaKWP68j39q2Eo/edit?usp=sharing ) (Suivi réunion SCRUM)


- [Maquette Figma](https://www.figma.com/file/yZ3n6Dh3PViBhDWJAEFhMh/AutoResa?node-id=1%3A2&t=9P61pSlhDyEeTVup-1)

## **Utilisation de GIT**

```bash
# Cloner le projet dans un dossier
    cd existing_repo
    git clone https://gitlab.com/lpweb2/resa-vehicule.git

# Pour récupérer le projet git (ex:branch dev)
    git checkout dev
    git pull origin/dev

# Pour créer une nouvelle branche
    # Branche de feature
        git checkout -b features/<nom_branche>
    # Branche de release
        git checkout -b release/<nom_branche>
    # Branche de hotfix
        git checkout -b hotfix/<nom_branche>

# Pour push
    git add .
    git commit -a -m "ton_commit"
    git push

# Pour merge une feature sur dev
    make new merge request sur git 
    branch features/...
    -> sur dev
    Assign SwaiiZ
```

***
