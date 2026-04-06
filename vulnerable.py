
def check_admin_access(password):
    ADMIN_PASSWORD = "Password123!"   
    
    if password == ADMIN_PASSWORD:
        print("Access Granted.")
    else:
        print("Access Denied.")

user_input = input("Enter admin password: ")
check_admin_access(user_input)

