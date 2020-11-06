# Now Developing 2020/09/14-
 
# Develop "Time-series daily graphs" arranged in a calendar for one year !
#   1) Refer to sample 1 and 2 to develop
#   2) As a function that allows multiple columns to be plotted.
#   input: df['datetime(index)','column1','column2',...]
 
import numpy as np
import pandas as pd
import datetime as dt
import matplotlib.pyplot as plt
from matplotlib.patches import Polygon
from mpl_toolkits.axes_grid1.inset_locator import inset_axes
 
# Settings
years = [2018] # e.g.[2018, 2019, 2020]
weeks = [1, 2, 3, 4, 5, 6]
days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
month_names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
               'September', 'October', 'November', 'December']

#Dummy Data
np.random.seed(1)
data3 = pd.DataFrame({"C" : np.random.randint(low=1, high=100, size=10),
                     "D"  : np.random.normal(0.0, 1.0, size=10)
                     })
def generate_data():
    idx = pd.date_range('2018-01-01', periods=365, freq='D')
    return pd.Series(range(len(idx)), index=idx)
 

def split_months(df, year):
    """
    Take a df, slice by year, and produce a list of months,
    where each month is a 2D array in the shape of the calendar
    :param df: dataframe or series
    :return: matrix for daily values and numerals
    """
    df = df[df.index.year == year]
 
    # Empty matrices
    a = np.empty((6, 7))
    a[:] = np.nan
 
    day_nums = {m:np.copy(a) for m in range(1,13)}# matrix for day numbers
    day_vals = {m:np.copy(a) for m in range(1,13)}# matrix for day values
 
    # Logic to shape datetimes to matrices in calendar layout
    for d in df.iteritems():  # use iterrows if you have a DataFrame
 
        day = d[0].day
        month = d[0].month
        col = d[0].dayofweek
 
        if d[0].is_month_start:
            row = 0
 
        day_nums[month][row, col] = day  # day number (0-31)
        day_vals[month][row, col] = d[1] # day value (the heatmap data)
 
        if col == 6:
            row += 1
 
    return day_nums, day_vals

def create_year_calendar(year, day_nums, day_vals, df_p):
    fig, axs = plt.subplots(12, 1, figsize=(20, 200))
 
    for i, ax in enumerate(axs.flat):
 
        ax.imshow(day_vals[i+1], cmap='gray_r', vmin=-365, vmax=3650, aspect='auto')  # heatmap
        ax.set_title(str(year) + ' ' + month_names[i],  fontsize=20, fontweight='bold', color='#555555', pad=20)
                
        # Labels
        ax.set_xticks(np.arange(len(days)))
        ax.set_xticklabels(days, fontsize=14, fontweight='bold', color='#555555')
        ax.set_yticklabels([])
 
        # Tick marks
        ax.tick_params(axis=u'both', which=u'both', length=0)  # remove tick marks
        ax.xaxis.tick_top()
 
        # Modify tick locations for proper grid placement
        ax.set_xticks(np.arange(-.5, 6, 1), minor=True)
        ax.set_yticks(np.arange(-.5, 5, 1), minor=True)
        ax.grid(which='minor', color='w', linestyle='-', linewidth=2.1)
 
        for edge in ['left', 'right', 'bottom', 'top']:
            ax.spines[edge].set_color('#FFFFFF')
        
        for w in range(len(weeks)):
            for d in range(len(days)):
                day_val = day_vals[i+1][w, d]
                day_num = day_nums[i+1][w, d]
                
                # ----------------------------------------------------------
                # Make the graph here?
                ax_plot = inset_axes(ax, width=2.32, height=1.92,
                                    bbox_to_anchor=(-0.008+d*0.1425, (5-w)*0.166,0,0), #x, y
                                    bbox_transform=ax.transAxes, loc=3)
                ax_plot.patch.set_alpha(0.0)
                        
                # Tick marks
                ax_plot.tick_params(axis=u'both', which=u'both', length=0)  # remove tick marks
                ax_plot.xaxis.tick_top()

                # Remove x-axis & y-axis value also y-value limit
                ax_plot.set_xticklabels([]) 
                ax_plot.set_yticklabels([])
                ax_plot.set_ylim([-0.05,1.9])
                
                #prediction value & Actual Value
                if not np.isnan(day_num):
                    DATE = str(dt.datetime.strptime(str(year)+'-'+str(i+1)+'-'+str(int(day_num)), '%Y-%m-%d').date())
                    ax_plot.plot(df_p['coolwater'].loc[DATE], color='b') #actual value
                    ax_plot.plot(df_p['dummy_coolwater'].loc[DATE], color='r') #predicted value

                #remove plot border
                ax_plot.axis("off")
                # ----------------------------------------------------------
 
                if not np.isnan(day_num):
                    ax.text(d+0.47, w-0.42, f"{day_num:0.0f}",
                             ha="right", va="center",
                             fontsize=10, color="#003333", alpha=0.8)  # day
 
                # Aesthetic background for calendar day number
                patch_coords = ((d+0.25, w-0.5),
                                (d+0.5, w-0.5),
                                (d+0.5, w-0.25))
 
                triangle = Polygon(patch_coords, fc='w', alpha=0.7)
                ax.add_artist(triangle)
 
        # Final adjustments
        #fig.suptitle(year, fontsize=16)
        plt.subplots_adjust(wspace=0.1, hspace=0.1)

        # Save to file
        FILE =dt.datetime.strptime(str(year)+'-'+str(i+1), '%Y-%m').date()
        FILE =FILE.strftime("%Y%m") #Extract the Year-Month in datetime format
        
        # Save the figure monthly
        plt.savefig('dummy.png')
        extent = ax.get_window_extent().transformed(fig.dpi_scale_trans.inverted())
        plt.savefig('cg'+FILE+'.png', bbox_inches=extent.expanded(1.1, 1.2))
    
##### Main
 
# csv_read
df_csv = pd.read_csv('shimizu_2015-2018.csv', sep=',')
 
df_csv['datetime'] = pd.to_datetime(df_csv['datetime'])
df_i = df_csv.set_index('datetime') 
 
df_i['coolwater'] = df_i['coolwater'] * -1
df_r = df_i.replace(-999999,-0.001)
df_r = df_r.replace(999999,-0.001)

df_r['dummy_coolwater'] = df_r['coolwater']+np.random.rand(df_r['coolwater'].shape[0]) / 6.0 #dummy predicted variable

for year in years:
    df = generate_data()
    day_nums, day_vals = split_months(df, year)
    create_year_calendar(year, day_nums, day_vals, df_r)