# Préparation de la séance 5
Ressources à étudier :
- Documentation php sur json_encode() et json_decode()
- Documentation sur slim v2 
```
1. Lorsque la fonction json_encode() reçoit un tableau PHP, expliquez  dans quels cas elle retourne une chaine correspondant

à un tableau json : '[ ... ]' : Cas où le paramètre est un tableau sans clé (sauf si paramètre JSON_FORCE_OBJECT)
à un objet json : '{ ... }' : Cas où le paramètre est un tableau avec clés

```
2. en utilisant le micro-framework slim, comment accède-t-on aux données transmises dans la requête sans utiliser les tableau $_GET et $_POST :
```
1. pour les données dans l'url : $app->request->get('paramName'); 
2. pour les données dans le corps de la requête : $app->request->getBody();
```
3. en utilisant slim, comment positionner :
```
1. le code de retour de la réponse (200, 404, 401 …) : utiliser $app->response->setStatus(x); Pour récupérer :$app->response->getStatus()
2. un header dans la réponse : $app->response->header->set('Content-type'...)
$app->response->header->get(...)
```