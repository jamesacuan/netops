from tkinter import *

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
   
menubar = Menu(root)
filemenu = Menu(menubar, tearoff=0)
filemenu.add_command(label="Scan...", command=donothing)

filemenu.add_separator()
filemenu.add_command(label="Configure database...", command=showConfigureDatabase)
filemenu.add_command(label="Exit", command=root.quit)
menubar.add_cascade(label="File", menu=filemenu)
editmenu = Menu(menubar, tearoff=0)
editmenu.add_command(label="Undo", command=donothing)

editmenu.add_separator()


menubar.add_cascade(label="Edit", menu=editmenu)

topFrame = Frame(root)
topFrame.pack()

bottomFrame = Frame(root)
bottomFrame.pack(side=BOTTOM)

button1 = Button(topFrame, text="Scan")
button2 = Button(topFrame, text="Scan 2")
button3 = Button(topFrame, text="Scan 3")

button1.pack(side=RIGHT)
button2.pack(side=LEFT)
button3.pack(side=LEFT)

root.config(menu=menubar)
root.mainloop()
