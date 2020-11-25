using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Vcare
{
    #region Garage
    public class Garage
    {
        #region Member Variables
        protected int _gid;
        protected string _gname;
        protected string _gemail;
        protected string _gphone;
        protected string _gaddress;
        protected string _gpin;
        protected string _gpassword;
        #endregion
        #region Constructors
        public Garage() { }
        public Garage(string gname, string gemail, string gphone, string gaddress, string gpin, string gpassword)
        {
            this._gname=gname;
            this._gemail=gemail;
            this._gphone=gphone;
            this._gaddress=gaddress;
            this._gpin=gpin;
            this._gpassword=gpassword;
        }
        #endregion
        #region Public Properties
        public virtual int Gid
        {
            get {return _gid;}
            set {_gid=value;}
        }
        public virtual string Gname
        {
            get {return _gname;}
            set {_gname=value;}
        }
        public virtual string Gemail
        {
            get {return _gemail;}
            set {_gemail=value;}
        }
        public virtual string Gphone
        {
            get {return _gphone;}
            set {_gphone=value;}
        }
        public virtual string Gaddress
        {
            get {return _gaddress;}
            set {_gaddress=value;}
        }
        public virtual string Gpin
        {
            get {return _gpin;}
            set {_gpin=value;}
        }
        public virtual string Gpassword
        {
            get {return _gpassword;}
            set {_gpassword=value;}
        }
        #endregion
    }
    #endregion
}