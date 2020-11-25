using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Vcare
{
    #region User
    public class User
    {
        #region Member Variables
        protected int _uid;
        protected string _uname;
        protected string _email;
        protected string _address;
        protected string _ucity;
        protected string _upin;
        protected string _password;
        #endregion
        #region Constructors
        public User() { }
        public User(string uname, string email, string address, string ucity, string upin, string password)
        {
            this._uname=uname;
            this._email=email;
            this._address=address;
            this._ucity=ucity;
            this._upin=upin;
            this._password=password;
        }
        #endregion
        #region Public Properties
        public virtual int Uid
        {
            get {return _uid;}
            set {_uid=value;}
        }
        public virtual string Uname
        {
            get {return _uname;}
            set {_uname=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Address
        {
            get {return _address;}
            set {_address=value;}
        }
        public virtual string Ucity
        {
            get {return _ucity;}
            set {_ucity=value;}
        }
        public virtual string Upin
        {
            get {return _upin;}
            set {_upin=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        #endregion
    }
    #endregion
}