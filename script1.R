args <- commandArgs(TRUE)
a <- args[1]
b <- args[3]


#????????????庫
library(RODBC)
library(dbConnect)
library(DBI)
library(gWidgets)
library(RMySQL)
library(xlsx)
 
con = dbConnect(MySQL(), dbname = "land_king",username = "root", password = ""
                    ,host = "localhost")
dbListTables(con)

  # s <- paste(
  #   "SELECT *",
  #   "FROM official_land")

s <- paste(
  "SELECT *",
  "FROM official_land",
  "WHERE  district = ",a ," AND duan = ",b )

land1 = dbGetQuery(con, s)

#繪???
library(ggplot2)

png(filename="output/land0.png", width = 600, height = 400)

ggplot(land1, aes(x = year, y = price)) +
  geom_line(colour= "red", size = 1,group = 1)+
  geom_point(colour= "red", size=3, shape = 21, fill="white")+
  ggtitle("Land price trends") +
  theme(plot.title = element_text(hjust = 0.5))+ 
  theme(plot.title = element_text(size=22)) +
  theme(axis.text.x = element_text(colour="grey20",size=12))+
  theme(axis.text.y = element_text(colour="grey20",size=12))+
  theme(axis.title.x = element_text(colour="grey20",size=18))+
  theme(axis.title.y = element_text(colour="grey20",size=18))


dev.off()


# 
#  killDbConnections <- function () {
#   
#   all_cons <- dbListConnections(MySQL())
#   
#   print(all_cons)
#   
#   for(con in all_cons)
#     +  dbDisconnect(con)
#   
#   print(paste(length(all_cons), " connections killed."))
#   
# }

# x <- 400
# s <- paste(
#   "SELECT *",
#   "FROM name",
#   "WHERE statistic = '",x,"'")