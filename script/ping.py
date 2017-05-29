from tkinter import *
import os

root = Tk()

def donothing():
   filewin = Toplevel(root)
   button = Button(filewin, text="Do nothing button")
   button.pack()

def showConfigureDatabase():
    windb = Toplevel(root)
    lbl1  = Label(windb, text="MySQL Directory")
    lbl2  = Label(windb, text="Username")
    lbl3  = Label(windb, text="Password")
    ent1  = Entry(windb)
    ent2  = Entry(windb)
    ent3  = Entry(windb)
    btn1  = Button(windb, text="Save")
    btn2  = Button(windb, text="Test connection")

    lbl1.grid(row=0, sticky=E)
    lbl2.grid(row=1, sticky=E)
    lbl3.grid(row=2, sticky=E)

    btn1.grid(row=3)
    btn2.grid(row=3, column=1)

    ent1.insert(0, "C:\\xampp\\mysql\\bin\\")
    ent2.insert(0, "root")
    ent1.grid(row=0, column=1)
    ent2.grid(row=1, column=1)
    ent3.grid(row=2, column=1)

def openSelection(evt):
   value   = str((Lb1.get(ACTIVE)))
   winhost = Toplevel(root)
   winhost.title(value)
   lbl1    = Label(winhost, text="IP Address")
   lbl2    = Label(winhost, text="MAC Address")
   lbl3    = Label(winhost, text="Hostname")
   lbl4    = Label(winhost, text="Operating System")

   ent1    = Entry(winhost)
   ent2    = Entry(winhost)
   ent3    = Entry(winhost)
   ent4    = Entry(winhost)

   lbl1.grid(row=0, sticky=E)
   lbl2.grid(row=1, sticky=E)
   lbl3.grid(row=2, sticky=E)
   lbl4.grid(row=3, sticky=E)

   ent1.insert(0, "")
   ent2.insert(0, "")
   ent3.insert(0, value)
   ent4.insert(0, "")

   ent1.grid(row=0, column=1)
   ent2.grid(row=1, column=1)
   ent3.grid(row=2, column=1)
   ent4.grid(row=3, column=1)
   
def quit():
    root.destroy()
   
menubar = Menu(root)
filemenu = Menu(menubar, tearoff=0)
filemenu.add_command(label="Scan...", command=donothing)

filemenu.add_separator()
filemenu.add_command(label="Configure database...", command=showConfigureDatabase)
filemenu.add_command(label="Exit", command=quit)
menubar.add_cascade(label="File", menu=filemenu)
editmenu = Menu(menubar, tearoff=0)
editmenu.add_command(label="Undo", command=donothing)

editmenu.add_separator()


menubar.add_cascade(label="Edit", menu=editmenu)

# TOOLBAR

toolbar = Frame(root)
toolbar.pack(side=TOP, fill=X)

button1 = Button(toolbar, text="Scan", command=donothing)
button1.pack(side=LEFT, padx=5, pady=2)

# STATUSBAR

status = Label(root, text="status...", bd=1, relief=SUNKEN, anchor=W)
status.pack(side=BOTTOM, fill=X)

# BODY
Sb1 = Scrollbar(root)
Sb1.pack(side=RIGHT, fill=Y)

Lb1 = Listbox(root, yscrollcommand=Sb1.set)
for x in range(1, 50):
    Lb1.insert(x, "HOSTNAME " + str(x))

Lb1.bind("<Double-Button-1>", openSelection)
Lb1.pack(expand=1,fill=BOTH)

Sb1.config(command=Lb1.yview)

root.title("Ping")
root.geometry("300x500")
root.config(menu=menubar)
root.mainloop()
