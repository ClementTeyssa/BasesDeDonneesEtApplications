# Schéma SQL
```
Categorie(idCateg, nom, descr)
Annonce(idAnnonce, titre, date, texte)
Photo(idPhoto, file, date, taille_octet, #idAnnonce)
Type(idCateg, idAnnonce)
```

# Proposer les méthodes des associations
- Annonce
```
    public function categories() {
        return
            $this->belongsToMany('Categorie',
                'Type',
                'idAnnonce',
                'idCateg');
    }

    public function photos(){
        return $this->hasMany('Photo', 'idAnnonce');
    }
```
- Categorie
```
    public function annonces() {
            return
                $this->belongsToMany('Annonce',
                    'Type',
                    'idCateg',
                    'idAnnonce');
    }
```
- Photo
```
    public function annonce(){
            return $this->belongsTo('Annonce', 'idAnnonce');
    }
```

# Ecrire les requètes suivantes

- les photos de l'annonce 22
```
$res1 = \bdd\models\Annonce::find(22)->photos;
```
- les photos de l'annonce 22 dont la taille en octets est > 100000
```
$res2 = \bdd\models\Annonce::find(22)
    ->photos
    ->where("taille_octet", ">", 100000)
    ->get();
```
- les annonces possédant plus de 3 photos
```
$res3 = \bdd\models\Annonce::has("photos", ">", 3)->get();
```
- les annonces possédant des photos dont la taille est > 100000
```
$res4 = \bdd\models\Annonce::whereHas("photos", function ($q){
    $q->where("taille_octet", ">", 100000)->get();
})->get();
```
- ajouter une photo à l'annonce 22
```
$p = new \bdd\models\Photo();
$p->file = "img.png";
$p->date = "2018-03-14";
$p->taille = 94635;
$p->save();

$res5 = \bdd\models\Annonce::find(22);
$res5->photos->attach($p->idPhoto);
```
- ajouter l'annonce 22 aux catégories 42 et 73
```
$res6 = \bdd\models\Annonce::find(22);
$res6->categories->attach([42,73]);
```