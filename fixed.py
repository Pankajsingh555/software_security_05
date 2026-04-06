import os
import hashlib
import hmac

stored_hash = os.getenv("ADMIN_HASH")

def check_admin_access(password):
    if not stored_hash:
        print("Admin hash not configured.")
        return
    
    hashed_input = hashlib.sha256(password.encode()).hexdigest()
    
    if hmac.compare_digest(hashed_input, stored_hash):
        print("Access Granted.")
    else:
        print("Access Denied.")

user_input = input("Enter admin password: ")
check_admin_access(user_input)
