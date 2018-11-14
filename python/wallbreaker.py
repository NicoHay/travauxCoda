from tkinter import *
 
class brick():
	""" on defini l'object brick """
	def __init__(self):
		self.canvas = canvas
		#coordonnees
		self.x1= x1
		self.y1= y1
		self.x2= x2
		self.y2= y2		
		#dessin
		self.dessin = canvas.create_rectangle(x1,y1,x2,y2, fill="green")
		self.point = 10

	def __del__(self):
		#destruction de la brique
		self.canvas.delete(self.dessin)

#################    FONCTIONS    ############################
#################    FONCTIONS BALLE
def deplacement_Balle():
    global dx, dy, collision
    #regle si la balle touche les bords du canevas
    #horizontal droite/gauche
    if canvas.coords(balle1)[2]>500 or  canvas.coords(balle1)[0]<0 :
        dx=-1*dx
    #vertical haut/bas
    if   canvas.coords(balle1)[1]<0 :
        dy=-1*dy
    #regle si la balle touche brique
   
    
    if canvas.coords(balle1)[3]>canvas.coords(barre)[1] and \
    canvas.coords(balle1)[0]<canvas.coords(barre)[2] and \
    canvas.coords(balle1)[2]>canvas.coords(barre)[0]  :
       	dy= -1*dy
    
    if (len(canvas.find_overlapping(canvas.coords(brique.dessin)[0],\
    canvas.coords(brique.dessin)[1],canvas.coords(brique.dessin)[2],\
    canvas.coords(brique.dessin)[3]))) > 1:
    	dy= -1*dy
    	canvas.delete(brique.dessin)

    #On deplace la balle :
    canvas.move(balle1,dx,dy)
    #On repete cette fonction
    tk.after(15,deplacement_Balle)
#################    FONCTIONS BARREPONG
def depl_Barre_Droite(event):
	global bx,by
	#sarrete si la barre touche le bord droit
	if canvas.coords(barre)[2]>480 :
		bx=0*bx
	else:
		canvas.move(barre,20,0)

def depl_Barre_Gauche(event):
	global bx,by
	#sarrete si la barre touche le bord droit
	if canvas.coords(barre)[0]<20 :
		bx=0*bx
	else:
		canvas.move(barre,-20,0)

#FONCTION NIVEAU

#definition de la zone des briques
def zoneBrick(cx1=5,cy1=5,cx2=495,cy2=155):
	canvas.create_rectangle(cx1,cy1,cx2,cy2)
#remplissage de la zone des briques	
# def remplissageLigneNiveau(x,y):
# 	"dessiner une ligne de carrés, en partant de x, y"
# 	print("1")
# 	i = 1
# 	while i < 5:
# 		brique.dessin
# 		i += 1
# 		print("1")
		





#################PROGRAMME############################

#Coordonnees de la balle:
Pos_X,Pos_Y=200,200
dx,dy=1,2
bx,by=250,0
x1,y1,x2,y2= 10, 50, 80, 80
# variables

 
#On cree une fenetre et un canvas:
tk = Tk()
canvas = Canvas(tk,width = 500, height = 400 , bd=0, bg="white")
canvas.pack(padx=10,pady=10)
 
#Creation  d'un bouton "Quitter":
Bouton_Quitter=Button(tk, text ='Quitter', command = tk.destroy)
#bouton_depl=Button(tk,text='deplacer',command=deplacement)
#On ajoute l'affichage du bouton dans la fenêtre tk:
Bouton_Quitter.pack()
#bouton_depl.pack()
 
#On cree une balle:
balle1 = canvas.create_oval(Pos_X,Pos_Y,Pos_X+20,Pos_Y+20,fill='red')
#brique.dessin
barre= canvas.create_rectangle(200,380,300,390, fill='black')

#cree une brique
brique=brick()
#dessine la brique
brique.dessin
#appel fonctions
zoneBrick()
deplacement_Balle()
# remplissageLigneNiveau(x1,y1)

#comportement clavier
canvas.bind_all('<Right>', depl_Barre_Droite)
canvas.bind_all('<Left>', depl_Barre_Gauche)
#On lance la boucle principale:
tk.mainloop()






""" 
######################### TODO  #########################

- voir pour colission en faire une fonction 
- changement couleur en fonction de colission
- desinner ligne de briques
- gerer les espace entre briques

######################### TODO  #########################
"""