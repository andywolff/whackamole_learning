cmake_minimum_required(VERSION 2.8.3)
project(whackamole_learning)

## Find catkin macros and libraries
## if COMPONENTS list like find_package(catkin REQUIRED COMPONENTS xyz)
## is used, also find other catkin packages
find_package(catkin REQUIRED COMPONENTS roscpp rospy std_msgs message_generation)

## System dependencies are found with CMake's conventions
# find_package(Boost REQUIRED COMPONENTS system)


## Uncomment this if the package has a setup.py. This macro ensures
## modules and global scripts declared therein get installed
## See http://ros.org/doc/api/catkin/html/user_guide/setup_dot_py.html
# catkin_python_setup()

#######################################
## Declare ROS messages and services ##
#######################################

# Generate messages in the 'msg' folder
 add_message_files(
   FILES
   TreeParams.msg
 )

## Generate services in the 'srv' folder
# add_service_files(
#   FILES
#   Service1.srv
#   Service2.srv
# )

## Generate added messages and services with any dependencies listed here
 generate_messages(
   DEPENDENCIES
   std_msgs
 )

###################################
## catkin specific configuration ##
###################################
## The catkin_package macro generates cmake config files for your package
## Declare things to be passed to dependent projects
## INCLUDE_DIRS: uncomment this if you package contains header files
## LIBRARIES: libraries you create in this project that dependent projects also need
## CATKIN_DEPENDS: catkin_packages dependent projects also need
## DEPENDS: system dependencies of this project that dependent projects also need
catkin_package(
#  INCLUDE_DIRS include
#  LIBRARIES waffles_ros
   CATKIN_DEPENDS roscpp rospy std_msgs message_runtime
#  DEPENDS system_lib
)

###########
## Build ##
###########

## Specify additional locations of header files
## Your package locations should be listed before other locations
# include_directories(include)
include_directories(
  ${catkin_INCLUDE_DIRS}
)

## Declare a cpp library
# add_library(waffles_ros
#   src/${PROJECT_NAME}/waffles_ros.cpp
# )

## Declare a cpp executable
add_executable(whackamole_learning_node src/whackamole_learning_node.cpp)

## Add cmake target dependencies of the executable/library
## as an example, message headers may need to be generated before nodes
# add_dependencies(waffles_ros_node waffles_ros_generate_messages_cpp)

# Specify libraries to link a library or executable target against
FIND_LIBRARY(WAFFLES_LIBRARY GClasses /home/andywolff/waffles/lib/GClasses.a)
 target_link_libraries(whackamole_learning_node
   ${catkin_LIBRARIES}
   ${WAFFLES_LIBRARY}
   mysqlclient
 )

