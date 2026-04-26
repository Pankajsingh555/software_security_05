import hashlib
import getpass

stored_username = "admin"

# Register
password = getpass.getpass("Set password: ")
stored_hash = hashlib.sha256(password.encode()).hexdigest()

print("\n--- LOGIN ---")

# Login
username = input("Enter username: ")
password = getpass.getpass("Enter password: ")

login_hash = hashlib.sha256(password.encode()).hexdigest()

if username == stored_username and login_hash == stored_hash:
    print("Login successful")
else:
    print("Login failed")



