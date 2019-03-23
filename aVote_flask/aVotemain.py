from flask import Flask,render_template,url_for, flash, redirect
from forms import RegistrationForm,LoginForm
app= Flask(__name__)
app.config['SECRET_KEY']='12345'

Posts=[
	{'author':"Phiwa",
	'title':'Blog Post 1',
	'content':'First post content',
	'date_posted':'April 20, 2018'
	},
	{'author':"Victor",
	'title':'Blog Post 2',
	'content':'Second post content',
	'date_posted':'April 21, 2018'
	}
	]
@app.route("/")
@app.route("/home")
def home():
	return render_template('home.html',posts=Posts,title='HOME')

@app.route("/about")
def about():
	return render_template('about.html', title='ABOUT')

@app.route("/register",methods=['GET','POST'])
def register():
	formregister=RegistrationForm()

	if formregister.validate_on_submit():
		flash("Account created for:{}".format(formregister.username.data),'success')
		return redirect(url_for('home'))
		
	return render_template('register.html',title='Register',form=formregister)

@app.route("/login",methods=['GET','POST'])
def login():
	formlogin=LoginForm()

	if formlogin.validate_on_submit():
		if formlogin.email.data =="phiwa02@gmail.com" and  formlogin.password.data=="123":
			flash("You are authenticated: SUCCESSFULLY",'success')
			return redirect(url_for('home'))
		else:
			flash("SORRY RE-ENTER YOUR DETAILS",'danger')

	return render_template('login.html',title='Login',form=formlogin)

if __name__ == "__main__":
	app.run(debug=True)
