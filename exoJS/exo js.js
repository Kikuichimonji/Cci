
let eleve = {
    _nom: "Jean",
    _prenom: "Michel",
    _age: "12",
    _couleurCheveux :"brun",

    set nom(nom){
        if(nom.length > 3)
            this._nom = nom;
        else
            throw new Error("Veuillez entrer un nom de plus de 3 charactères")
    },
    get nom(){
        return this._nom
    },
    set prenom(prenom){
        if(prenom.length > 3)
        this._prenom = prenom;
    else
        throw new Error("Veuillez entrer un prenom de plus de 3 charactères")
    },
    get prenom(){
        return this._prenom
    },
    set age(age){
        if(age < 0)
            throw new Error("L'age ne peux pas être négatif")
        else
            this._age = age
    },
    get age(){
        return this._age
    },
    set couleurCheveux(couleurCheveux){
        if(couleurCheveux.length > 3)
        this._couleurCheveux = couleurCheveux;
    else
        throw new Error("Veuillez entrer une couleur de plus de 3 charactères")
    },
    get couleurCheveux(){
        return this._couleurCheveux
    },

    salutation : function(){
        console.log(this.nom + " " + this.prenom + " " + this.age + " ans")
    }
}

eleve.salutation();
eleve.age = 50;
eleve.nom = "jeanmich"
eleve.salutation();



function add(numb1,numb2){
    return numb1+numb2;
}

function substract(numb1,numb2){
    return numb1-numb2;
}

function multiply(numb1,numb2){
    return numb1*numb2;
}

function divide(numb1,numb2){
    if(!numb2)
        throw new Error("Pas de division par 0")
    else
        return numb1/numb2
}

function power(numb, pow = 2){
    return numb ** pow;
}

function operation(numb1,numb2,ope){
    return window[ope](numb1,numb2);
}

let firstNumber = 5;
let secondNumber = 3;
let ope = "divide"

console.log(operation(firstNumber,secondNumber,"divide"))
console.log(operation(firstNumber,secondNumber,"power"))


let classe = {
    _emplacement: "145",
    _capacite: 20,
        professeur: {
            _nom: "machin",
            _matiere: "chimie",
        },
        eleve: [{
            _nom: "Jean",
            _prenom: "Michel",
            _age: "12",
            _couleurCheveux :"brun",
            
            set nom(nom){
                if(nom.length > 3)
                    this._nom = nom;
                else
                    throw new Error("Veuillez entrer un nom de plus de 3 charactères")
            },
            get nom(){
                return this._nom
            },
            set prenom(prenom){
                if(prenom.length > 3)
                this._prenom = prenom;
            else
                throw new Error("Veuillez entrer un prenom de plus de 3 charactères")
            },
            get prenom(){
                return this._prenom
            },
            set age(age){
                if(age < 0)
                    throw new Error("L'age ne peux pas être négatif")
                else
                    this._age = age
            },
            get age(){
                return this._age
            },
            set couleurCheveux(couleurCheveux){
                if(couleurCheveux.length > 3)
                this._couleurCheveux = couleurCheveux;
            else
                throw new Error("Veuillez entrer une couleur de plus de 3 charactères")
            },
            get couleurCheveux(){
                return this._couleurCheveux
            },

        
            salutation : function(){
                console.log(this.nom + " " + this.prenom + " " + this.age + " ans")
            }
        }],

        presenceProfesseur : function(){
            return this.professeur !== undefined ;
        },
        deleteProfesseur : function(){
            delete this.professeur;
        },
        nombreEleve : function(){
            return this.eleve.length;
        },
        addEleve : function(nom,prenom,age,couleurCheveux){
            newEleve = Object.create(this.eleve[0])
            //newEleve = {...this.eleve[0]}
            newEleve.nom = nom;
            newEleve.prenom = prenom;
            newEleve.age = age;
            newEleve.couleurCheveux = couleurCheveux;
            
            this.eleve.push(newEleve);
        }
}

console.log(classe.presenceProfesseur())
classe.deleteProfesseur()
console.log(classe.presenceProfesseur())
console.log(classe.nombreEleve())
classe.addEleve("Prenom2","Nom2",15,"marron")
console.log(classe.nombreEleve())
console.log(classe.eleve)
classe.eleve[1].salutation()
classe.eleve[1].nom = "test"
classe.eleve[1].salutation()
console.log(classe.eleve[1].nom)


class Humain{
    constructor(nom, prenom, age, couleurCheveux) {
        this._nom = nom;
        this._prenom = prenom;
        this._age = age;
        this._couleurCheveux = couleurCheveux;
    }

    salutation() {
        console.log(this._nom + " " + this._prenom + " " + this._age + " ans")
    }
}
class Eleve extends Humain{
    constructor(nom, prenom, age, couleurCheveux) {
        super(nom,prenom,age,couleurCheveux)
        this._notes = [];
    }

    set nom(nom) {
        if (nom.length > 3)
            this._nom = nom;
        else
            throw new Error("Veuillez entrer un nom de plus de 3 charactères")
    }
    get nom() {
        return this._nom
    }
    set prenom(prenom) {
        if (prenom.length > 3)
            this._prenom = prenom;
        else
            throw new Error("Veuillez entrer un prenom de plus de 3 charactères")
    }
    get prenom() {
        return this._prenom
    }
    set age(age) {
        if (age < 0)
            throw new Error("L'age ne peux pas être négatif")
        else
            this._age = age
    }
    get age() {
        return this._age
    }
    set couleurCheveux(couleurCheveux) {
        if (couleurCheveux.length > 3){
            this._couleurCheveux = couleurCheveux;
        }else{
            throw new Error("Veuillez entrer une couleur de plus de 3 charactères")
        }
    }
    get couleurCheveux() {
        return this._couleurCheveux
    }
    set notes(note) {
        if(note > 0)
            this._notes.push(note)
        else
            throw new Error("La note ne peux pas être négative")
    }
    get notes() {
        if (this._notes)
            return this._notes;
        else
            throw new Error("Cet élève n'as pas encore de notes")
    }

}

class Professeur extends Humain{
    constructor(nom,prenom,age,couleurCheveux,matiere) {
        super(nom,prenom,age,couleurCheveux)
        this._matière = matiere;
    }

    set nom(nom) {
        this._nom = nom;
    }
    get nom() {
        return this._nom;
    }
    set matiere(matiere) {
        this._matiere = matiere;
    }
    get matiere() {
        return this.matiere;
    }
}

class Classe {
    constructor(emplacement, capacite) {
        this._emplacement = emplacement;
        this._capacite = capacite;
        this._professeur = undefined;
        this._eleves = []
    }


    presenceProfesseur() {
        return this._professeur !== undefined;
    }
    deleteProfesseur() {
        delete this._professeur;
    }
    nombreEleve() {
        return this._eleves.length;
    }
    addEleve(eleve){
        if(eleve instanceof Eleve)
        {
            if (this._eleves.length >= this._capacite)
                throw new Error("La classe est pleine");
            else {
                this._eleves.push(eleve);
                return "La classe contient maintenant " + this._eleves.length + " élèves."
            }
        }
    }
    removeEleve(eleve) {
        let index = this.eleves.indexOf(eleve);
        if (index !== -1) {
            this.eleves.splice(index, 1);
        } else {
            throw new Error('Student not found');
        }
    }
    getListNote()
    {
        let listeNotes = [];
        this.eleves.forEach(eleve =>{
            eleve.notes.forEach(note =>{
                listeNotes.push(note)
            })
        })
        return listeNotes;
    }
    moyenne(){
        let numbNotes = 0;
        let moy = 0;
        this.eleves.forEach(eleve =>{
            if(eleve.notes)
                eleve.notes.forEach(note =>{   
                    numbNotes++;
                    moy += note;
                })
        })
        return moy/numbNotes;
    }
    mediane(){
        let listeNotes = this.getListNote();
        listeNotes = listeNotes.slice(0).sort(function(x, y) {
            return x - y;
        });
        var index = (listeNotes.length + 1) / 2;
        return (listeNotes.length % 2) ? listeNotes[index - 1] : (listeNotes[index - 1.5] + listeNotes[index - 0.5]) / 2;
    }
    mode(){
        let listeNotes = this.getListNote();
        return listeNotes.sort((a,b) => listeNotes.filter(v => v===a).length - listeNotes.filter(v => v===b).length).pop();    
    }

    set emplacement(emplacement) {
        this._emplacement = emplacement;
    }
    get emplacement() {
        return this._emplacement;
    }
    set capacite(capacite) {
        this._capacite = capacite;
    }
    get capacite() {
        return this._capacite;
    }
    get professeur(){
        return this._professeur;
    }
    set professeur(professeur) {
        if(professeur instanceof Professeur)
            this._professeur = professeur;
    }
    get eleves(){
        return this._eleves;
    }

}


classe1 = new Classe("245",20)
console.log(classe1)
eleve1 = new Eleve("Jean", "Michmuch", 50, "marron");
eleve2 = new Eleve("Jean", "deux", 20, "rouge");
classe1.addEleve(eleve1)
console.log(classe1.addEleve(eleve2));
console.log(classe1.eleves)
prof1 = new Professeur("Prof", "tournesol",13,"Chimie")
classe1.professeur = prof1;
console.log(classe1.professeur)
classe1.eleves[0].notes = 12;
classe1.eleves[0].notes = 18;
classe1.eleves[1].notes = 17;
classe1.eleves[1].notes = 17;
classe1.eleves[1].notes = 30;
console.log(classe1.eleves[0].notes);
console.log(classe1.moyenne());
console.log(classe1.mediane());
console.log(classe1.mode());
console.log([])
classe1.professeur.salutation();

