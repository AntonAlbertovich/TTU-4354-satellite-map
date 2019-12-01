import math
import plotly.graph_objects as go
import numpy as np
import mysql.connector


# Get access to the database
mydb = mysql.connector.connect(
    # host="localhost",
    #user="root",
    #passwd="Q.E.D.",
    #database="satellite"
     host="127.0.0.1",
    user="root",
    passwd="",
    database="TTU4354satellitemap"
)

# Query the database with the sql string and return the result
def query(sql):

    mycursor = mydb.cursor()

    mycursor.execute(sql)

    result = mycursor.fetchall()

    return result

# Return the y value of ellipse equation in 2-D plane 
# int x int  x  int  ->  int
def ellipse_equation(apogee,perigee,x):
    # y = sqrt of  (1- x^2 / a^2) * b^2
    return math.sqrt((1 - (x**2)/(apogee ** 2))*(perigee ** 2))

# Vectorize the first ellipse equation function
v_ellipse_equation= np.vectorize(ellipse_equation, excluded = ['apogee, perigee'])

# Retrieve results from query function
results = query("SELECT Apogee_km, Perigee_km FROM orbit_table LIMIT 5")



def plot_ellipsis(results,fig):

    for r in results:

        # Random points along the x axis

        value_0 = r[0] 

        value_1 = r[1]

        value_2 = r[0]

        value_0 = int(value_0 or 0)
        value_1 = int(value_1 or 0)
        value_2 = int(value_2 or 0)
        value_2 = -value_2

        t = np.linspace(value_2,value_0,500)

        # Get crresponding y values
        y = v_ellipse_equation(value_0, value_1, t)

        # Get other posible y-value due to sqrt 
        new_vals = [-1*x for x in y]

        fig.add_trace(go.Scatter(x = t, y = y, mode='lines'))

        fig.add_trace(go.Scatter(x = t, y = new_vals, mode = 'lines' ))

fig = go.Figure()

plot_ellipsis(results,fig)

fig.show()

